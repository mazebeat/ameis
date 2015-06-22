<?php

/**
 * Class ApiController
 */
class ApiController extends \BaseController
{

	public function __construct()
	{
	}

	/**
	 * @param       $rules
	 * @param array $except
	 *
	 * @return mixed
	 */
	public function validateInputs($rules, $except = array('_token'))
	{
		$root = \Request::path();
		if (!count($except)) {
			$except = \Input::except($except);
		}

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to($root)->withErrors($validator)->withInput($except);
		}
	}

	/**
	 * @param string $sql
	 *
	 * @return string
	 */
	public function get_message($sql = '')
	{
		if (count($sql) && $sql == '') {
			$message = '';
		}
		else {
			$message = 'No se han encontrado resultados a su busqueda.';
		}

		return $message;
	}

	/**
	 * @param      $name
	 * @param      $query
	 * @param int  $minutes
	 * @param bool $sqlRequest
	 *
	 * @return mixed
	 */
	public function store_query_cache($name, $query, $minutes = 1, $sqlRequest = true)
	{
		if ($sqlRequest) {
			$sql = exec_sp($query);
		}
		else {
			$sql = $query;
		}

		$minutes = Carbon::now()->addMinutes($minutes);
		Cache::put($name, $sql, $minutes);
		unset($minutes);

		return $sql;
	}

	/**
	 *
	 */
	public function connectSp()
	{
		$server   = '10.185.30.243\INST1';
		$database = 'ReportesDespachos';
		$user     = 'emessuser';
		$clave    = $user . '2013';

		$conn = new PDO("sqlsrv:server=$server;Database=$database;", "$user", "$clave");
		//	$statement = DB::connection()->getReadPdo()->prepare("EXEC obtenerDetalle 'FIJA','0001',1,2014");
		$statement = $conn->prepare("EXEC REPORTEESTADODESPACHO_EX1 '20130624 08:00:00' , '20130624 20:59:59'");
		//	$statement = $conn->prepare("EXEC obtenerDetalle 'FIJA','0001',1,2014");
		$statement->execute();
		var_dump($statement);
		//		while ($row = $statement->fetchAll(PDO::FETCH_ASSOC)) {
		//			var_dump($row);
		//		}
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function returnComunas()
	{
		$Id_Ciudad = Input::get('Id_Ciudad');

		return Comuna::select(array('Descripcion', 'Id_Comuna'))->where('Id_Ciudad', $Id_Ciudad)->get(array('Descripcion', 'Id_Comuna'));
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function returnCiudades()
	{
		return Ciudad::select(array('Descripcion', 'Id_Comuna'))->get(array('Descripcion', 'Id_Comuna'));
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function returnService()
	{
		$tipoServicio = Input::get('tipoServicio');

		if (isset($tipoServicio) && $tipoServicio != '') {
			$query   = "EXEC dbo.AMEIS_RetornaServicio '" . $tipoServicio . "', 0, 'OK'";
			$resulta = \ApiController::exec_sp($query);
			$data    = $resulta['data'];

			return \Response::json($data);
		}
	}

	/**
	 * @param string $sql
	 *
	 * @return array
	 */
	public static function exec_sp($sql = '')
	{
		$result = array();
		$data   = array('data' => array(), 'message' => '', 'status' => false);
		try {
			if ($sql != '') {

				$pdo = \DB::connection()->getPdo();
				try {
					$stmt = $pdo->query($sql);

					do {
						$rowset = $stmt->fetchAll(PDO::FETCH_NAMED);
						if ($rowset) {
							foreach ($rowset as $row) {
								array_push($result, $row);
							}
						}
					} while ($stmt->nextRowset());

				} catch (PDOException $ex) {
					$data['message'] = 'Error: ' . $pdo->errorInfo() . ' | ' . $pdo->errorCode();
				}
				if (count($result) <= 0) {
					$data['message'] = 'No se encontraron datos en la consulta';
				}
				else {
					$data['data']    = $result;
					$data['message'] = 'OK';
					$data['status']  = true;
				}
			}
			else {
				$data['message'] = 'Sentencia SQL invalida';
			}
		} catch (Exception $e) {
			$data['message'] = 'Error: ' . $e->getMessage() . ' LINE: ' . $e->getLine();
		}

		return $data;
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function returnClient()
	{
		$rut    = Input::get('rut', null);
		$nombre = Input::get('nombre', null);

		if (isset($rut) && $rut != '') {
			if (Str::contains($rut, '-')) {
				$rut   = explode('-', $rut);
				$query = "EXEC dbo.AMEIS_RetornaClientesPorRut " . $rut[0] . ", 0, 'OK'";
			}
			else {
				$query = "EXEC dbo.AMEIS_RetornaClientesPorRut " . $rut . ", 0, 'OK'";
			}
			$resulta = ApiController::exec_sp($query);
			$data    = $resulta['data'];

			return Response::json($data);
		}

		if (isset($nombre) && $nombre != '') {
			$query   = "EXEC dbo.AMEIS_RetornaClientesPorNombre '" . $nombre . "', 0, 'OK'";
			$resulta = ApiController::exec_sp($query);
			$data    = $resulta['data'];

			return Response::json($data);
		}
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function saveCotizacion()
	{
		$xml = Input::get('xml');
		$xml = \Functions::toXML($xml);

		$query   = "EXEC dbo.AMEIS_GeneraCotizacion '" . $xml . "', 0, 'OK'";
		$resulta = \ApiController::exec_sp($query);

		return Response::json($resulta);
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function returnCotizacion()
	{
		$nroCotiz = Input::get('nroCotiz');

		if (isset($nroCotiz) && $nroCotiz != '') {
			$query   = "EXEC dbo.AMEIS_RetornaCotizacion " . $nroCotiz . ", 0, 'OK'";
			$resulta = ApiController::exec_sp($query);
			$data    = $resulta['data'];

			return Response::json($data);
		}
	}

	public function returnServUM()
	{
		$idServicio = Input::get('Id_Servicio');
		if (isset($idServicio) && $idServicio != '') {
			$query   = "EXEC dbo.AMEIS_RetornaServUM '" . $idServicio . "', 0, 'OK'";
			$resulta = ApiController::exec_sp($query);
			$data    = $resulta['data'];

			return Response::json($data);
		}
	}
}
