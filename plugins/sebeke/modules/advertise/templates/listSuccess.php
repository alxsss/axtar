<?php
// auto-generated by sfPropelCrud
// date: 2008/08/15 16:06:02
?>
<h1>advertise</h1>

<table>
<thead>
<tr>
  <th>Id</th>
  <th>Advertiser name</th>
  <th>Company</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Comment</th>
  <th>Created at</th>
</tr>
</thead>
<tbody>
<?php foreach ($advertises as $advertise): ?>
<tr>
    <td><?php echo link_to($advertise->getId(), 'advertise/show?id='.$advertise->getId()) ?></td>
      <td><?php echo $advertise->getAdvertiserName() ?></td>
      <td><?php echo $advertise->getCompany() ?></td>
      <td><?php echo $advertise->getEmail() ?></td>
      <td><?php echo $advertise->getPhone() ?></td>
      <td><?php echo $advertise->getComment() ?></td>
      <td><?php echo $advertise->getCreatedAt() ?></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<?php echo link_to ('create', 'advertise/create') ?>
