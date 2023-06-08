


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><?php echo $titulo; ?></h4>                   
                      

                        <form action="<?php echo base_url()?>categorias/insertar" method="POST" autocomplete="off">
                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="nombre" class="mb-2">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  autofocus require>
                                </div>
                              
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-start gap-5 ">
                            <a href="<?php echo base_url()?>categorias" class="btn btn-sm btn-info">Regresar</a>
                            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
                

                  
                </main>