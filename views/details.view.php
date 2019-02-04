<?php
/**
 * License: GPL3  2018. Michael Williams Manic Designer Developments.
 */
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 1/19/18
 * Time: 2:26 PM
 */
?>

<?php include SHARED_PATH . '/header.php'; ?>

<header role="banner" class='container-fluid'>
    <section class='row'>
        <h1 class="col-12 col-md-4 tools logo__section logo">
            <a class="logo__title logo" href="<?php echo url_for( '/index.php'); ?>">Gary's Tools</a>
        </h1>
    </section>
</header>

<?php include(SHARED_PATH . '/nav.php'); ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo url_for('/index.php'); ?>">Home</a></li>
                <?php if(isset($id)) { ?>
                <?php $breadcrumb = detail_breadcrumb_query($id); ?>
                <?php foreach ($breadcrumb as $crumb) { ?>
                    <li class="breadcrumb-item"><a href="/pages/catalog.php?cat=<?php echo $crumb['category']; ?>"><?php echo $crumb['category']; ?></a></li>
                    <li class="breadcrumb-item active"><?php echo $crumb['code']; ?></li>
                <?php } ?>
                <?php } /* isset for breadcrumb*/?>
            </ol>
        </nav>
    </div><!--/col-12-->
</div><!-- /.row -->
<section>
    <div class="container">
        <div class="row">
                <?php if(isset($id)) {   ?>
                <?php foreach ($details = single_item_details($id) as $item) { ?>
                    <div class="col-12 col-sm-6">
                        <article role="article" class='card'>
                            <h1>Code: <?php echo $item['code']; ?></h1>
                            <h3>Name: <?php echo $item['name']; ?></h3>
                            <h3>Brand:<?php echo $item['brand']; ?></h3>
                            <h4>Category: <?php echo $item['category']; ?></h4>
                            <h4>Pieces: <?php echo $item['pieces']; ?></h4>
                            <h4>Quantity: <?php echo $item['quantity']; ?></h4>
                            <h4>Retail Price $ <?php echo $retail = ($item['retail'] == 0 ? ' N/A' : $item['retail']); ?></h4>
                            <h4>Price: <?php echo $price = ($item['price'] == 0 ? 'Make offer' : '$' . $item['price']); ?></h4>
                            <h4 class="sale">Sold: <?php echo  $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold'); ?></h4>
                            <h4>Code: <?php echo $item['code']; ?></h4>
                            <p>Description: <?php echo $item['description']; ?></p>

                        </article>
                    </div>

                <?php }
                } /* isset for $items */
                    if(isset($id)) {
                        $images = detail_images_query($id);
                    foreach ($images as $image) :
                    ?>
                    <div class="col-12 col-sm-6">
                        <img class="card" src="<?php echo IMAGES . $image['image']; ?>" alt="<?php echo $image['description']; ?>">
                    </div>
                <?php  endforeach;
                 } /* images isset */?>

    </div>
</section>

<?php include(SHARED_PATH . '/footer.php'); ?>
