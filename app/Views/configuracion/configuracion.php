


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><?php echo $titulo; ?></h4>
                               
                        <?php if (isset($validation)){?>
                           <div class="alert alert-danger">
                                <h3>Errores en Formulario</h3>
                               <?php echo $validation->listErrors();?>   
                                      
                            </div> 
                        <?php }?>

                        <form action="<?php echo base_url()?>configuracion/actualizar" method="POST" autocomplete="off">
                        <?php csrf_field()?>

                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="tienda_nombre" class="mb-2">Nombre de la Tienda</label>
                                    <input  type="text" class="form-control <?php if (isset($validation) && $validation->hasError('tienda_nombre')) { echo 'border border-danger'; } ?>" 
                                            id="tienda_nombre" name="tienda_nombre" 
                                            placeholder="Nombre de la tienda"  value="<?php echo $nombre['valor']?>" 
                                             >
                                    <span class="text-danger fw-bold"><?php if (isset($validation) && $validation->hasError('tienda_nombre')) { echo 'No puede ir vacio'; } ?></span>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="tienda_rfc" class="mb-2">RFC</label>
                                    <input type="text" class="form-control <?php if (isset($validation) && $validation->hasError('tienda_rfc')) { echo 'border border-danger'; } ?>" 
                                           id="tienda_rfc" name="tienda_rfc" 
                                           placeholder="RFC" value="<?php echo $rfc['valor']?>" >
                                    <span class="text-danger fw-bold"><?php if (isset($validation) && $validation->hasError('tienda_rfc')) { echo 'No puede ir vacio'; } ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="tienda_telefono" class="mb-2">Telefono de la Tienda</label>
                                    <input  type="text" class="form-control <?php if (isset($validation) && $validation->hasError('tienda_telefono')) { echo 'border border-danger'; } ?>" 
                                            id="tienda_telefono" name="tienda_telefono" 
                                            placeholder="Nombre de la tienda" value="<?php echo $telefono['valor']?>" 
                                            >
                                    <span class="text-danger fw-bold"><?php if (isset($validation) && $validation->hasError('tienda_telefono')) { echo 'No puede ir vacio'; } ?></span>        
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="tienda_email" class="mb-2">Correo de la tienda</label>
                                    <input type="text" class="form-control <?php if (isset($validation) && $validation->hasError('tienda_email')) { echo 'border border-danger'; } ?>" 
                                           id="tienda_email" name="tienda_email" 
                                           placeholder="Email de tienda" value="<?php echo $email['valor']?>" >
                                    <span class="text-danger fw-bold"><?php if (isset($validation) && $validation->hasError('tienda_email')) { echo 'Email no válido'; } ?></span>       
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div  style="margin-top: 50px;" class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="tienda_direccion" class="mb-2">Dirección de la Tienda</label>
                                    <textarea class="form-control <?php if (isset($validation) && $validation->hasError('tienda_direccion')) { echo 'border border-danger'; } ?>" name="tienda_direccion" id="tienda_direccion" ><?php echo $direccion['valor']?></textarea>
                                    <span class="text-danger fw-bold"><?php if (isset($validation) && $validation->hasError('tienda_email')) { echo 'No puede ir vacio'; } ?></span> 
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="ticket_leyenda" class="mb-2">Leyenda del ticket</label>
                                    <textarea class="form-control <?php if (isset($validation) && $validation->hasError('ticket_leyenda')) { echo 'border border-danger'; } ?>" name="ticket_leyenda" id="ticket_leyenda" ><?php echo $leyenda['valor']?></textarea>
                                    <span class="text-danger fw-bold"><?php if (isset($validation) && $validation->hasError('tienda_email')) { echo 'No puede ir vacio'; } ?></span> 
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-start gap-5 ">
                            <a href="<?php echo base_url()?>configuracion" class="btn btn-sm btn-info">Regresar</a>
                            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        </div>
                    </form>
                        
                       
                        
                        
                    </div>

                  
                </main>





<!-- Modal -->
<div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel">ELIMINAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p class="text-white">Desea Eliminar?</p>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <a class="btn btn-warning btn-ok">Eliminar</a>
      </div>
    </div>
  </div>
</div>