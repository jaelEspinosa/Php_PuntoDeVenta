


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><?php echo $titulo; ?></h4> 

                        <?php if (isset($validation)){?>
                           <div class="alert alert-danger">
                               <?php echo $validation->listErrors();?>   
                                      
                            </div> 
                        <?php }?>

                        <form action="<?php echo base_url()?>usuarios/insertar" method="POST" autocomplete="off">
                        <?php csrf_field()?>

                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="usuario" class="mb-2">Usuario</label>
                                    <input  type="text" class="form-control" 
                                            id="usuario" name="usuario" 
                                            placeholder="Usuario"  value="<?php echo set_value('usuario')?>" 
                                            autofocus >
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="nombre" class="mb-2">Nombre_corto</label>
                                    <input type="text" class="form-control" 
                                           id="nombre" name="nombre" 
                                           placeholder="Nombre" value="<?php echo set_value('nombre')?>" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="password" class="mb-2">Password</label>
                                    <input  type="password" class="form-control" 
                                            id="password" name="password" 
                                            placeholder="Password"  value="<?php echo set_value('password')?>" 
                                            autofocus >
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="re_password" class="mb-2">Repite Contraseña</label>
                                    <input type="password" class="form-control" 
                                           id="re_password" name="re_password" 
                                           placeholder="Repetir password" value="<?php echo set_value('re_password')?>" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                               
                               
                                <div class="col-12 col-sm-6">
                                    <label for="id_caja" class="mb-2">Caja</label>
                                    <select class="form-select" id="id_caja" name="id_caja" value="<?php echo set_value('id_caja')?>">
                                        <option class="text-gray" value="">Seleccione Caja</option>
                                        <?php foreach($cajas as $caja){?>
                                            <option value="<?php echo $caja['id']?>"><?php echo $caja['nombre']?></option>

                                         <?php }?>    
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="id_role" class="mb-2">Role</label>
                                   
                                    <select class="form-select" id="id_role" name="id_role" value="<?php echo set_value('id_role')?>">
                                        <option value="">Seleccione Role</option>
                                        <?php foreach($roles as $role){?>
                                            <option value="<?php echo $role['id']?>"><?php echo $role['nombre']?></option>

                                         <?php }?>    
                                    </select>
                                </div>
                               
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-start gap-5 ">
                            <a href="<?php echo base_url()?>usuarios" class="btn btn-sm btn-info">Regresar</a>
                            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
                

                  
                </main>