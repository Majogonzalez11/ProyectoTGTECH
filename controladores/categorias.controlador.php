<?php 
class ControladorCategorias {

/*Crear categoria*/ 

static public function ctrCrearCategoria() {
    if(isset($_POST["nuevaCategoria"])) {
        if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){
            $tabla = "categorias";
            $datos = $_POST["nuevaCategoria"];
            $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

            if($respuesta == "ok"){
                echo '<script>

            swal({
            
            type: "success",
            title: "¡La categoría ha sido guardada correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
   
            }).then((result)=>{
            
               if(result.value){
                  
                  window.location = "categorias";
               
               }
               });
            
            </script>';
            }



        } else {
            echo '<script>

            swal({
            
            type: "error",
            title: "¡La categoría no puede ir vacia o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
   
            }).then((result)=>{
            
               if(result.value){
                  
                  window.location = "categorias";
               
               }
               });
            
            </script>';
        }
    }
}
/*Mostrar categorias */

static public function ctrMostrarCategorias($item, $valor){
    $tabla = "categorias";
    $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
    return $respuesta;
}

    /*Editar categoria*/ 
    
    static public function ctrEditarCategoria() {
        if (isset($_POST["editarCategoria"])) {
            $tabla = "categorias";

            $datos = array(
                "id" => $_POST["idCategoria"],
                "categoria" => $_POST["editarCategoria"]
            );

            $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "¡La categoría ha sido cambiada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if (result.value) {
                            window.location = "categorias";
                        }
                    })
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡Error al cambiar la categoría!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    });
                </script>';
            }
        }
    }
    /*Borrar categoria*/ 
    static public function ctrBorrarCategoria(){

        if(isset($_GET["idCategoria"])){
            $tabla = "Categorias";
            $datos = $_GET["idCategoria"];

            $respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

            if($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "¡La categoría ha sido borrada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if (result.value) {
                            window.location = "categorias";
                        }
                    })
                </script>';


            }


        }
    }


}    



?>