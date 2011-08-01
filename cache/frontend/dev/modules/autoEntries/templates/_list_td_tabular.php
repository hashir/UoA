<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($entries->getId(), 'entries_edit', $entries) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $entries->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $entries->getEmail() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_photo">
  <?php echo $entries->getPhoto() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_story">
  <?php echo $entries->getStory() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_auth_publish">
  <?php echo get_partial('entries/list_field_boolean', array('value' => $entries->getAuthPublish())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_auth_contact">
  <?php echo get_partial('entries/list_field_boolean', array('value' => $entries->getAuthContact())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_notify_publish">
  <?php echo get_partial('entries/list_field_boolean', array('value' => $entries->getNotifyPublish())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_approved">
  <?php echo get_partial('entries/list_field_boolean', array('value' => $entries->getApproved())) ?>
</td>
<td class="sf_admin_enum sf_admin_list_td_source">
  <?php echo $entries->getSource() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($entries->getCreatedAt()) ? format_date($entries->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($entries->getUpdatedAt()) ? format_date($entries->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
