<?php

use app\assets\PdfAsset;

PdfAsset::register($this);

?>

<style>
    p {
        margin: 0px;
        color: black;
    }
</style>

<page size="LETTER">

    <div class="margin_paper">

        <div class="titleA">
            <p class="ptitle">
                PDF
            </p>
        </div>

        <div class="wrapper1">
            <div class="pp"></div>
            <div class="pp pe">No.</div>
            <div class="pp pc">
                <?= $model->id ?>
            </div>
        </div>

        <div class="wrapper2">
            <div class="pp psb">Application id</div>
            <div class="pp psb">Customer_id</div>
        </div>

        <div class="wrapper2">
            <div class="pp pc"><?= $model->application_id ?></div>
            <div class="pp pc"><?= $model->customer_id ?></div>
        </div>

        <div class="wrapper3">
            <div class="pp psb">User id</div>
            <div class="pp pc"><?= $model->user_id ?></div>
        </div>


        <div class="titleA">
            <p class="ptitle">
                DETAILS
            </p>
        </div>

        <div class="wrapper2">
            <div class="pp psb">Legal Name</div>
            <div class="pp psb">Business Name</div>
        </div>

        <div class="wrapper2">
            <div class="pp pc"><?= $model->legal_name ?></div>
            <div class="pp pc"><?= $model->business_name ?></div>
        </div>

        <div class="wrapper2">
            <div class="pp psb">Business Address</div>
            <div class="pp psb">Business Mailing Address</div>
        </div>

        <div class="wrapper2">
            <div class="pp pc"><?= $model->business_address ?></div>
            <div class="pp pc"><?= $model->business_mailing_address ?></div>
        </div>

        <div class="wrapper2">
            <div class="pp psb">Business phone</div>
            <div class="pp psb">Business fax</div>
        </div>

        <div class="wrapper2">
            <div class="pp pc"><?= $model->business_phone ?></div>
            <div class="pp pc"><?= $model->business_fax ?></div>
        </div>

        <div class="wrapper4">
            <div class="pp psb">Business Email</div>
            <div class="pp psb">Application Type</div>
            <div class="pp psb">Business Title</div>
            <div class="pp psb">Lang</div>
        </div>

        <div class="wrapper4">
            <div class="pp pc"><?= $model->business_email ?></div>
            <div class="pp pc"><?= $model->application_type ?></div>
            <div class="pp pc"><?= $model->business_title ?></div>
            <div class="pp pc">
                <?php
                if ($model->lang == 1)
                    echo 'En';
                else if ($model->lang == 2)
                    echo 'Es';
                else
                    echo 'Fr';
                ?>
            </div>
        </div>

    </div>

</page>