<?php

interface KontrakViewSirkuit
{
    public function tampilList($listSirkuit): string;
    public function tampilForm($data = null): string;
}

?>
