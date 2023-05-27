<div class="container">
    <!-- The Modal -->
    <div class="modal" id="modal_edit_art">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body" style="box-shadow: 0px 0px 10px 10px rgba(0, 0, 0, 0.4)">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <span class="modal-title"  id="mostrar_id">Id</span>
                    <h2 class="modal-title text-center">Editar Artículo <img class="ml-3" id="ver_img_art" height="70" width="100" alt="Imagen de articulo"></h2>

                    <form action="" method="post" id="form_editar_art">
                        <input type="hidden">
                        <div class="text-center mt-3"><label for="ver_nom_prod"><strong>Nombre Artículo</strong></label></div>
                        <input type="text" class="form-control mb-2 mr-sm-4 col-12 bg-light" placeholder="Nombre Producto" id="ver_nom_prod" name="nom_prod">
                        <div class="text-center"><label for="ver_marca_prod" class="text-center"><strong>Marca Artículo</strong></label></div>
                        <input type="text" class="form-control mb-2 mr-sm-4 col-12 bg-light" placeholder="Marca Producto" id="ver_marca_prod" name="marca_prod">
                        <div class="text-center"><label for="ver_descrip_prod" class="text-center"><strong>Descripción Artículo</strong></label></div>
                        <div class="container mt-2">
                            <div class="text-center"><textarea style="resize: none;" class="bg-light" id="ver_descrip_prod" cols="57" rows="5" name="descrip_prod"></textarea></div>
                        </div>
                        <div>
                            <div class="text-center"><label for="art_img"><strong>Cambiar Imagen</strong></label></div>
                        </div>
                        <!-- <input type="file" width="30" height="30" name="art_img" id="art_img" accept="image/jpej, image/png"> -->
                        <div class="modal-footer">
                            <!-- <input type="reset" class="btn btn-warning" value="Limpiar" data-dismiss="modal"> -->
                            <input type="reset" class="btn btn-secondary" value="Limpiar campos">
                            <input type="hidden" id="ver_id_prod">
                            <button type="button" class="btn btn-primary" onclick="editArt()">Guardar cambios</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
