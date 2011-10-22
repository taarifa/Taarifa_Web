function removeGroup(group_id, incident_id) {
  $.post('/admin/reports/remove_group', { group_id: group_id, incident_id: incident_id },
    function(data){
      // Remove the group and change the status
      $('#group' + group_id).remove();
      $('#form_id').val(2);
    });
}
