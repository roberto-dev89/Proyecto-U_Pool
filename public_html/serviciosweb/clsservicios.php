<?php
class clsservicios{
    public function acceso($usuario,$contra){
        $datos=array();
        require('conexion.php');
        $renglon = query("CALL spValidarAcceso('$usuario','$contra')");
        while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[0]["ID"]=$resultado["CLAVE"];
            if ((int)$datos[0]!=0) {
                $datos[1]["NOMBRE"] =$resultado["NOMBRE"];
                $datos[2]["USUARIO"] =$resultado["USUARIO"];
                $datos[3]["ROL"] =$resultado["ROL"];
                $datos[4]["FOTO"] =$resultado["FOTO"];
            }
        }
        return $datos;
    }
    public function registrarUsuarios($matri,$usu,$contra,$tel){
        $datos = array();   
        
        require('conexion.php');
        
        // Ejecuta el procedimiento de consulta
        $renglon = query("CALL spRegistrarUsuario('$matri','$usu','$contra','$tel');");
       
        while ($resultado = mysqli_fetch_assoc($renglon)) {
            $datos[0]["REGISTRADO"] = $resultado["CLAVE"];
        }
        
        return $datos;
    }
    public function registrarAdmin($matri,$usu,$contra,$tel,$tipo){
        $datos = array();   
        
        require('conexion.php');
        
        // Ejecuta el procedimiento de consulta
        $renglon = query("CALL spRegistrarAdmin('$matri','$usu','$contra','$tel','$tipo');");
       
        while ($resultado = mysqli_fetch_assoc($renglon)) {
            $datos[0]["REGISTRADO"] = $resultado["CLAVE"];
        }
        
        return $datos;
    }
    public function mostrarusuarios()
    {
        $datos=array();   
        $reg=0; 
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spListarUsuarios(2,1)");
   
  	  			
		while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[$reg]["ID"]=$resultado["ID"];				
		    $datos[$reg]["NOMBRE"] =$resultado["NOMBRE"];					
		    $datos[$reg]["USUARIO"] =$resultado["USUARIO"];
		    $datos[$reg]["CONTRA"] =$resultado["CONTRASENA"];
		    $datos[$reg]["FOTO"] =$resultado["FOTO"];
		    $datos[$reg]["TELEFONO"] =$resultado["TELEFONO"];
		    $datos[$reg]["ESTATUS"] =$resultado["ESTATUS"];					
		    $datos[$reg]["FECHA"] =$resultado["FECHA"];
			$reg++;
		}							
        ///mysqli_close($conn); 		
    
        return $datos;
    }
    public function mostrarDatosUsuario($usuario)
    {
        $datos=array();   
        $reg=0; 
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spListarUsuarios(1,'$usuario')");
   
  	  			
		while($resultado = mysqli_fetch_assoc($renglon)){
		    $datos[$reg]["NOMBRE"] =$resultado["NOMBRE"];					
		    $datos[$reg]["USUARIO"] =$resultado["USUARIO"];
		    $datos[$reg]["CONTRA"] =$resultado["CONTRASENA"];
		    $datos[$reg]["FOTO"] =$resultado["FOTO"];
		    $datos[$reg]["TELEFONO"] =$resultado["TELEFONO"];
		    $datos[$reg]["MATRICULA"] =$resultado["MATRICULA"];					
		    $datos[$reg]["ESTATUS"] =$resultado["ESTATUS"];
			$reg++;
		}							
        ///mysqli_close($conn); 		
    
        return $datos;
    }
    public function borrarUsuarios($id){
        $datos = array();   
        
        require('conexion.php');
        
        // Ejecuta el procedimiento de consulta
        $renglon = query("CALL spBorrarUsuario('$id');");
       
        while ($resultado = mysqli_fetch_assoc($renglon)) {
            $datos[0]["ELIMINADO"] = $resultado["CLAVE"];
        }
        
        return $datos;
    }
    
    public function borrarViajes($id){
        $datos = array();   
        
        require('conexion.php');
        
        // Ejecuta el procedimiento de consulta
        $renglon = query("CALL spBorrarViaje('$id');");
       
        while ($resultado = mysqli_fetch_assoc($renglon)) {
            $datos[0]["ELIMINADO"] = $resultado["CLAVE"];
        }
        
        return $datos;
    }
    
    public function actualizarDatos($usu,$usuN,$tel,$contra){
        
        require('conexion.php');
        
        $renglon = query("call spActualizarDatos('$usu','$usuN','$tel','$contra');");

    }
    public function solicitudes($usu){
        $datos = array();   
        
        require('conexion.php');
        
        // Ejecuta el procedimiento de consulta
        $renglon = query("CALL spConductor('$usu');");
       
        while ($resultado = mysqli_fetch_assoc($renglon)) {
            $datos[0]["ESTATUS"] = $resultado["ESTATUS"];
            $datos[0]["CLAVE"] = $resultado["CLAVE"];
            
        }
        
        return $datos;
    }
    public function listarTipos()
    {
        $datos=array();   
        $reg=0; 
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spListarTipos()");
   
  	  			
		while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[$reg]["CLAVE"]=$resultado["CLAVE"];				
		    $datos[$reg]["ROL"] =$resultado["ROL"];					
			$reg++;
		}							
        ///mysqli_close($conn); 		
    
        return $datos;
    }
    public function listarLugares()
    {
        $datos=array();   
        $reg=0; 
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spListarLugares()");
   
  	  			
		while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[$reg]["CLAVE"]=$resultado["CLAVE"];				
		    $datos[$reg]["LUGAR"] =$resultado["LUGAR"];					
			$reg++;
		}							
        ///mysqli_close($conn); 		
    
        return $datos;
    }
    public function registrarViaje($id,$costo,$hora,$fecha,$asientos,$origen,$destino){
        $datos = array();   
        
        require('conexion.php');
        
        // Ejecuta el procedimiento de consulta
        $renglon = query("CALL spRegistrarViaje('$id','$costo','$hora','$fecha','$asientos','$origen','$destino');");
        while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[0]["REGISTRADO"]=$resultado["CLAVE"];
        return $datos;
        }
    }
    public function registrarParada($viaje,$parada){
        $datos = array();   
        
        require('conexion.php');
        
        // Ejecuta el procedimiento de consulta
        $renglon = query("CALL spRegistrarParada('$viaje','$parada');");
       
        while ($resultado = mysqli_fetch_assoc($renglon)) {
            $datos[0]["REGISTRADO"] = $resultado["CLAVE"];
        }
        
        return $datos;
    }
    public function registrarLugar($lugar,$direccion){
        $datos = array();   
        
        require('conexion.php');
        
        // Ejecuta el procedimiento de consulta
        $renglon = query("CALL spRegistrarLugar('$lugar','$direccion');");
       
        while ($resultado = mysqli_fetch_assoc($renglon)) {
            $datos[0]["REGISTRADO"] = $resultado["CLAVE"];
        }
        
        return $datos;
    }
    
    public function registrarSolicitud($permisof,$permisod,$seguro,$autof,$autop,$autod,$usu){
        $datos = array();   
        
        require('conexion.php');
        
        // Ejecuta el procedimiento de consulta
        $renglon = query("CALL spEnviarSolicitud('$permisof','$permisod','$seguro','$autof','$autop','$autod','$usu');");
       
        while ($resultado = mysqli_fetch_assoc($renglon)) {
            $datos[0]["REGISTRADO"] = $resultado["CLAVE"];
        }
        
        return $datos;
    }
    
    public function listarViajes($id,$fecha,$hora)
    {
        $datos=array();   
        $reg=0; 
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spListarViajes('$id','$fecha','$hora')");
   
  	  			
		while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[$reg]["HORA"]=$resultado["HORA"];				
		    $datos[$reg]["FECHA"] =$resultado["FECHA"];	
		    $datos[$reg]["ORIGEN"] =$resultado["ORIGEN"];	
		    $datos[$reg]["DESTINO"] =$resultado["DESTINO"];	
		    $datos[$reg]["COSTO"] =$resultado["COSTO"];	
		    $datos[$reg]["NOMBRE"] =$resultado["NOMBRE"];	
		    $datos[$reg]["FOTO"] =$resultado["FOTO"];
		    $datos[$reg]["VIAJE"] =$resultado["VIAJE"];
			$reg++;
		}							
        ///mysqli_close($conn); 		
    
        return $datos;
    }
    
    public function listarSolicitud()
    {
        $datos=array();   
        $reg=0; 
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spListarSolicitudes()");
   
  	  			
		while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[$reg]["FRENTEPERMISO"]=$resultado["FRENTEPERMISO"];				
		    $datos[$reg]["DETRASPERMISO"] =$resultado["DETRASPERMISO"];	
		    $datos[$reg]["SEGURO"] =$resultado["SEGURO"];	
		    $datos[$reg]["FRENTEAUTO"] =$resultado["FRENTEAUTO"];	
		    $datos[$reg]["PERFILAUTO"] =$resultado["PERFILAUTO"];	
		    $datos[$reg]["DETRASAUTO"] =$resultado["DETRASAUTO"];
		    $datos[$reg]["USUARIO"] =$resultado["USUARIO"];
			$reg++;
		}							
        ///mysqli_close($conn); 		
    
        return $datos;
    }
    
    public function lugar($id)
    {
        $datos=array();   
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spLugar('$id')");
   
  	  			
		while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[0]["NOMBRE"]=$resultado["NOMBRE"];
		}							
        ///mysqli_close($conn); 		
    
        return $datos;
    }
    public function registrarIntegrante($id,$usu)
    {
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spRegistrarIntegrante('$id','$usu')");
   
    }
    
    public function listarMisViajes($usuario)
    {
        $datos=array();   
        $reg=0; 
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spListarMisViajes('$usuario')");
   
  	  			
		while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[$reg]["HORA"]=$resultado["HORA"];				
		    $datos[$reg]["FECHA"] =$resultado["FECHA"];	
		    $datos[$reg]["ORIGEN"] =$resultado["ORIGEN"];	
		    $datos[$reg]["DESTINO"] =$resultado["DESTINO"];	
		    $datos[$reg]["COSTO"] =$resultado["COSTO"];	
		    $datos[$reg]["NOMBRE"] =$resultado["NOMBRE"];	
		    $datos[$reg]["FOTO"] =$resultado["FOTO"];
		    $datos[$reg]["VIAJE"] =$resultado["VIAJE"];
			$reg++;
		}							
        ///mysqli_close($conn); 		
    
        return $datos;
    }
    public function listarTodosViajes()
    {
        $datos=array();   
        $reg=0; 
  
        require('conexion.php');
        //EJECUTA EL PROCEDIMIENTO DE CONSULTA
        $renglon = query("CALL spListarTodosViajes()");
   
  	  			
		while($resultado = mysqli_fetch_assoc($renglon)){
            $datos[$reg]["HORA"]=$resultado["HORA"];				
		    $datos[$reg]["FECHA"] =$resultado["FECHA"];	
		    $datos[$reg]["ORIGEN"] =$resultado["ORIGEN"];	
		    $datos[$reg]["DESTINO"] =$resultado["DESTINO"];	
		    $datos[$reg]["COSTO"] =$resultado["COSTO"];	
		    $datos[$reg]["NOMBRE"] =$resultado["NOMBRE"];	
		    $datos[$reg]["FOTO"] =$resultado["FOTO"];
		    $datos[$reg]["VIAJE"] =$resultado["VIAJE"];
			$reg++;
		}							
        ///mysqli_close($conn); 		
    
        return $datos;
    }
}
?>
