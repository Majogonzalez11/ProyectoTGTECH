<div class="content-wrapper" style="background-color: #EAEAEA;">

    <section class="content header" style="background-color: #5A3E8A;">
        <h1 style="color: white;">
            Administrar usuarios
        </h1>
        <ol class="breadcrumb" style="background-color: #7D2BA2;">
            <li><a href="inicio" style="color: white;"> <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active" style="color: white;">Administrar Usuarios</li>
        </ol>
    </section> 


<section class="content">
    
    <div class="box" style="background-color:#EAEAEA;">
        <div class="box-header with-border" style="background-color:#EAEAEA;">
            <button class="btn btn primary" data-toggle="modal" data-target="#modalAgregarUsuario" style= "background: #5A3E8A; color:white;">
                Agregar Usuario
            </button>
        </div>


        <div class="box-body" >
            <table class="table table-bordered table-striped dt-responsive tablas">
              <thead>
                <tr>
                    <th style="width:10px">#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acciones</th>  
                </tr>

             </thead>

             <tbody >         

            <?php

            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            foreach ($usuarios as $key => $value){
                
                echo '
                                <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["usuario"].'</td>
                                <td>'.$value["password"].'</td>
                                <td>'.$value["rol"].'</td>
                                <td>
                                 <div class="btn-group">
                        <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id_usuario"].'" data-toggle="modal" data-target="#modalEditarUsuario"  ><i class="fa fa-pencil"></i> </button>
                        <button class="btn btn-danger btnEliminarUsuario" btnEliminarUsuario" idUsuarioo="'.$value["id_usuario"].'"><i class="fa fa-times"></i> </button>
                </div>
                </td>
                </tr>';
             }

            ?>

            
             </tbody>
            </table>
        </div>
    </div>
    </section>
</div>

<!--(bootstrap) modal agregar usuario-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog" style="background-color: #EAEAEA;" >
        <div class="modal-content" style="background-color: #EAEAEA;">

             <!--CABEZA DE MODAL-->
            
        <div class="modal-header" style="background:#5A3E8A; color:white" >
                <button type="button" class="close" data-dismiss="modal" style="color:#EAEAEA;">&times;</button>
                <h4 class="modal-title">Agregar usuario</h4>
            </div>
            
                <form role="form" method="post">
                <!--CUERPO DE MODAL-->

 

                <!-- ENTRADA PARA EL NOMBRE-->
                        <div class="fom-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>


                    </div>
                    </div>

                <!-- ENTRADA PARA EL USUARIO-->
                    <div class="fom-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>


                    </div>
                    </div>


                    <!-- ENTRADA PARA EL CONTRASEÑA-->
                    <div class="fom-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>


                    </div>
                    </div>


                    <!-- ENTRADA PARA SELECCIONAR SU ROL-->
                    <div class="fom-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input lg" name="nuevoRol">

                                    <option value="">Seleccionar rol</option>

                                    <option value="Administrador">Administrador</option>

                                    <option value="Vendedor">Vendedor</option>

                                    <option value="Empleado Especial">Empleado especial</option>

                            
                                </select>


                    </div>
                    </div>

                    

                </div>
                    
                <!--PIE DE MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #8B5BA1;">Cerrar</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                
                </div>


                <?php

                $crearUsuario = new ControladorUsuarios();
                $crearUsuario -> ctrCrearUsuario();


                ?>


                </form>


        </div>
</div>
</div>

<!--============================
MODAL EDITAR USUARIO
=============================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">           

             <!--CABEZA DE MODAL-->
            
        <div class="modal-header" style="background:#5A3E8A; color:white" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar usuario</h4>
            </div>
            
             <!--CUERPO DE MODAL-->            

                <div class="modal-body">
                    <div class="box-body">

                <!-- ENTRADA PARA EL NOMBRE-->
                        <div class="fom-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg" name="editarNombre" value="" required>
                               


                    </div>
                    </div>

                <!-- ENTRADA PARA EL USUARIO-->
                    <div class="fom-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" id="editarUsuario" value="" required>


                    </div>
                    </div>


                    <!-- ENTRADA PARA EL CONTRASEÑA-->
                    <div class="fom-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Ingresar la nueva contraseña" required>


                    </div>
                    </div>


                    <!-- ENTRADA PARA SELECCIONAR SU ROL-->
                    <div class="fom-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input lg" name="editarRol">

                                    <option value="" id="editarRol">Ediat rol</option>

                                    <option value="Administrador">Administrador</option>

                                    <option value="Vendedor">Vendedor</option>

                                    <option value="Empleado Especial">Empleado especial</option>

                            
                                </select>


                    </div>
                    </div>

                    

                </div>
                    
                <!--PIE DE MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" class="btn btn pull-left" data-dismiss="modal" style="background-color: #8B5BA1;">Cerrar</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                
                </div>


                <!-- <?php

                $editarUsuario = new ControladorUsuarios();
                $editarUsuario -> ctrEditarUsuario();


                ?> -->


                </form>


        </div>
</div>
</div>