<?php

$oid = rex_request('oid', 'int');

if ($func == '') {
  $list = rex_list::factory('
    SELECT o.oid, o.name, o.street, o.city, o.url, o.tel, o.email
    FROM '. $REX['ADDON']['dbpref']['events'] .'orgs o
    ORDER BY oid
    LIMIT 10;');

  $imgHeader = '<a href="'. $list->getUrl(array('func' => 'add')) .'"><img src="media/metainfo_plus.gif" alt="add" title="add" /></a>';

  $list->setColumnSortable('name');
  $list->setColumnSortable('city');

  $list->addColumn(
    $imgHeader,
    '<img src="media/metainfo.gif" alt="field" title="field" />',
    0,
    array(
      '<th class="rex-icon">###VALUE###</th>',
      '<td class="rex-icon">###VALUE###</td>'
    )
  );

  $list->setColumnParams(
    $imgHeader,
    array('func' => 'edit', 'oid' => '###oid###')
  );


  $list->setColumnLabel('name', 'Veranstalter');
  $list->setColumnLabel('url', 'Website');
  $list->setColumnLabel('tel', 'Telefon');
  $list->setColumnLabel('email', 'Email-Adresse');
  $list->setColumnLabel('street', 'Stra&szlig;e');
  $list->setColumnLabel('city', 'Stadt');

  $list->removeColumn('oid');

  $list->setColumnLayout(
    'eid',
    array(
      '<th class="rex-icon">###VALUE###</th>',
      '<td class="rex-icon">###VALUE###</td>'
    )   
  );

  $list->setColumnParams('name', array('func' => 'edit', 'oid' => '###oid###'));
  $list->show();

} elseif ($func == 'edit' || $func == 'add') {
  $form = rex_form::factory($REX['ADDON']['dbpref']['events'].'orgs', 'Veranstalter', 'oid='.$oid);

  $field = &$form->addTextField('name');
  $field->setLabel('Veranstalter');

  $field = &$form->addInputField('url', 'url');
  $field->setLabel('Website');

  $field = &$form->addInputField('email', 'email');
  $field->setLabel('Email-Adresse');

  $field = &$form->addInputField('tel', 'tel');
  $field->setLabel('Telefon');

  $field = &$form->addTextField('street');
  $field->setLabel('Stra&szlig;e');

  $field = &$form->addTextField('city');
  $field->setLabel('Stadt');

  if ($func == 'edit') {
    $form->addParam('eid', $id);
  }

  $form->show();
}
?>
