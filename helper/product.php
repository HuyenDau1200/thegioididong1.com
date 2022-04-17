<?php
/**
 * Get Top 10 Product order by 'createdAt' desc.
 *
 * @return array
 */
function getTopProduct() {
    return db_fetch_array("select * from `tbl_products` order by `createdAt` desc limit 10");
}