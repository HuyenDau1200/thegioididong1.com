<?php

function getInfoPage($id) {
    return db_fetch_row("SELECT * FROM `tbl_pages` WHERE `pageId` = {$id}");
}