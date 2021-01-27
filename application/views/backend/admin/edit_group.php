<br><br><br><br><hr><?php
  $group_info = $this->db->get_where('group_message_thread', array('group_message_thread_code' => $param2))->row_array();
  $group_members = json_decode($group_info['members']);
?>
<form class="" action="<?php echo base_url();?>admin/group/edit_group/<?php echo $param2;?>" method="post">
  <div class="form-group">
    <label for="field-1" class="col-sm-3 control-label">Nombre del grupo</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="group_name" autofocus value="<?php echo $group_info['group_name']; ?>" required>
    </div>
  </div>

<?php
  $user_array = ['student', 'teacher', 'parent', 'admin'];
  for ($i=0; $i < sizeof($user_array); $i++):
    $user_list = $this->db->get($user_array[$i])->result_array();
    ?>
    <br/>
    <div class="col-md-12" style="margin-top: 10px;">
    <table  class="table table-bordered table-striped">
      <span class="col-md-6" style="font-size: 13px; color: #616161; text-align: left; padding: 0; margin: 0;"><u><?php echo ucfirst($user_array[$i]) .' List'; ?></u></span>

      <span class="col-md-4 pull-right" style="text-align: right; color: #616161;">
        <input type="checkbox" id = "<?php echo $user_array[$i]; ?>" onchange="checkAllBoxes(this)">&nbsp;Seleccionar todos
      </span>

      <thead>
        <tr>
          <th>Seleccionar</th>
          <th>Usuario</th>
          <th>Nombre</th>
        </tr>
      </thead>
      <?php foreach ($user_list as $user):?>
        <tr>
          <td width = "20%">
            <input type="checkbox" name="user[]" class="<?php echo $user_array[$i]; ?>" value="<?php echo $user_array[$i].'_'.$user[$user_array[$i].'_id']; ?>"
            <?php
              for ($j = 0; $j < sizeof($group_members); $j++) {
                if ($group_members[$j] == $user_array[$i].'_'.$user[$user_array[$i].'_id']) {
                  echo 'checked';
                  break;
                }
              }
            ?>>
          </td>
          <td width = "25%"><?php echo $user['username'] ?></td>
          <td width = "55%"><?php echo $user['name'] ?></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
<?php endfor; ?>
  <div class="pull-right">
    <button type="submit" name="submit" class="btn btn-success btn-md">Actualizar</button>
  </div>
</form>
<script type="text/javascript">
  function checkAllBoxes(check){
    var checkboxes = document.getElementsByTagName('input');

    if (check.checked) {
          $('.'+check.id).prop("checked", true);

     } else {
        $('.'+check.id).prop("checked", false);
     }
  }
</script>
