


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><?php echo $titulo; ?></h4>

                        <div>
                            <p>
                                <a href="<?php echo base_url()?>unidades/nuevo" class="btn btn-info btn-sm">Agregar</a>
                                <a href="<?php echo base_url()?>unidades/eliminados" class="btn btn-warning btn-sm">Eliminados</a>
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
                                            <th>N_Corto</th>
                                            <th>Acc.</th>
                                            
                                         
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                       <?php foreach($datos as $dato) { ?>
                                        <tr>
                                            <td><?php echo $dato['id']?></td>
                                            <td><?php echo $dato['nombre']?></td>
                                            <td><?php echo $dato['nombre_corto']?></td>
                                            <td><?php $dato['id']?>
                                            <div class="d-flex justify-content-evenly">
                                                <a href="<?php echo base_url()?>/unidades/editar/<?php echo $dato['id']?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" data-href="<?php echo base_url()?>/unidades/eliminar/<?php echo $dato['id']?>" data-bs-toggle="modal"
                                                   data-bs-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                                </a>
                                               <!--  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-confirma">
                                                        Launch demo modal
                                                        </button> -->
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