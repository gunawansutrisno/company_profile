<?php foreach ($data as $row) { ?>
    <embed src="<?= ASSETS_URL ?>file/iso/<?= $row->file ?>" type="application/pdf" width="100%" height="600px" />
<?php } ?>