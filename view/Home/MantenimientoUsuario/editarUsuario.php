<div class="container">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">


        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar usuario n°: <span id="mostrar_id"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post" id="form_editar_usuario">
            <input type="hidden" id="usu_id_edit">
            <label for="usu_email_editar">Email:</label>
            <input class="mr-3" type="text" id="usu_email_editar" name="usu_email" placeholder="ingrese usuario" autofocus>
            <label for="usu_pass_editar">Pass:</label>
            <input class="ml-3 mb-3" type="text" id="usu_pass_editar" name="usu_pass" placeholder="Ingrese password">
            <label for="usu_nom_editar">Nom:</label>
            <input class="ml-3 mb-3" type="text" id="usu_nom_editar" name="usu_nom" placeholder="Ingrese nombre">
            <label for="usu_ape_editar">Ape:</label>
            <input class="ml-3 mb-3" type="text" id="usu_ape_editar" name="usu_ape" placeholder="Ingrese apellido">
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="editUsu()">Guardar cambios</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
<script src="./consultarUsuario.js"></script>