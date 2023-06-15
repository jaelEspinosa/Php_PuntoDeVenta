


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><?php echo $titulo; ?></h4>

                        <div>
                            <p>                               
                                <a href="<?php echo base_url()?>clientes" class="btn btn-info btn-sm">Clientes</a>
                            </p>
                        </div>
                        
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Listado de <?php echo$titulo; ?>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Acc.</th>                                           
                                         
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                       <?php foreach($datos as $dato) { ?>
                                        <tr>
                                            <td><?php echo $dato['id']?></td>
                                            <td><?php echo $dato['nombre']?></td>
                                            <td><?php echo $dato['email']?></td>
                                            <td><?php echo $dato['direccion']?></td>
                                            <td><?php echo $dato['telefono']?></td>
                                            <td><?php $dato['id']?>
                                            <div class="d-flex justify-content-evenly">
                                                <a  href="#" data-href="<?php echo base_url()?>/clientes/restaurar/<?php echo $dato['id']?>" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                   data-bs-target="#modal-confirma" data-placement="top" title="Restaurar registro" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash-arrow-up"></i> Restaurar
                                                </a>
                                                
                                            </div>
                                            </td>
                                           
                                        </tr>
                                       <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                  
                </main>


                <!-- Modal -->
<div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title text-gray" id="exampleModalLabel">RESTAURAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p class="text-gray">Desea restaurar el registro?</p>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <a class="btn btn-warning btn-ok">Restaurar</a>
      </div>
    </div>
  </div>
</div>