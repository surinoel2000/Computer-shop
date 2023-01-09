<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <?php foreach($product as $value)
                    {
                ?>
                    <li><a href="#">{{ $value->category_name }}</a></li>
                    <li><a href="#">{{ $value->name_brand }}</a></li>
                    <li class="active">
                        <a href="#">
                            {{ $value->name_product }}
                        </a>
                    </li>
                    <?php
                    }
                ?>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
