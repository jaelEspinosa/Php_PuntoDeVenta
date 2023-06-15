


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                        <div class="col-sm-2"></div>  
                        <div class="col-12 col-sm-4">
                            <h4 class="mt-4"><?php echo $titulo; ?></h4>   
                        </div>
                        </div>
                
                        <?php \Config\Services::validation()->listErrors()?>                
                      

                        <form action="<?php echo base_url()?>clientes/insertar" method="POST" autocomplete="off">
                        <?php csrf_field()?>

                        

                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-12 col-sm-4">
                                    <label for="nombre" class="mb-2">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  autofocus required>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label for="email" class="mb-2">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"  required >
                                </div>
                               
                            </div>
                        </div>
                        <div class="form-group">
                           
                        </div>
                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                            <div class="col-sm-2"></div>
                                <div class="col-12 col-sm-4">
                                    <label for="direccion" class="mb-2">Direccion</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion"  required >
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label for="telefono" class="mb-2">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono"  required >
                                </div>
                               
                            </div>
                        </div>
                           <div class="row">
                           <div class="col-sm-2"></div>
                           <div class="mt-5 d-flex justify-content-start gap-5 col-12 col-sm-4">
                               <a href="<?php echo base_url()?>clientes" class="btn btn-sm btn-info">Regresar</a>
                               <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                           </div>
                           </div>                   
                    </form>
                </div>
                

                  
                </main>