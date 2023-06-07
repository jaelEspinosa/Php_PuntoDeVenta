
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><?php echo $titulo; ?></h4>                   
                      

                        <form action="<?php echo base_url()?>unidades/actualizar" method="POST" autocomplete="off">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $datos['id']?>" name="id"/>
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="nombre" class="mb-2">Nombre</label>
                                    <input value = "<?php echo $datos['nombre']?>"type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  autofocus require>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="nombre_corto" class="mb-2">Nombre_corto</label>
                                    <input value = "<?php echo $datos['nombre_corto']?>" type="text" class="form-control" id="nombre_corto" name="nombre_corto" placeholder="Nombre_corto" require>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-start gap-5 ">
                            <a href="<?php echo base_url()?>unidades" class="btn btn-sm btn-info">Regresar</a>
                            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
                

                  
                </main>