<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($search->getId(), 'search_edit', $search) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_query">
  <?php echo urldecode($search->getQuery()) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_module">
  <?php echo $search->getModule() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_raw_ip">
  <?php echo $search->getRawIp() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo $search->getCreatedAt() ? format_date($search->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
