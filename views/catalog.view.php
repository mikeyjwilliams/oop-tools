<?php
/**
 * License: GPL3 2018. Michael Williams Manic Designer Developments.
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
            <a class="logo__title logo" href="<?php echo url_for( 'index.php'); ?>">Gary's Tools</a>
        </h1>
    </section>
</header>

<?php require(SHARED_PATH . '/nav.php'); ?>


<section class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">
                <?php if (isset($page_name)) { echo $page_name;  } ?>
            </h1>
        </div>
        <section aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="" aria-current="page" href="<?php echo url_for('index.php'); ?>">Home</a></li>
                <?php if(isset($param)) { ?>
                    <?php $breadcrumb = catalog_breadcrumb_query($param); ?>
                    <?php foreach ($breadcrumb as $crumb) { ?>
                        <li class="breadcrumb-item">
                            <a class="disabled text-muted" href="/pages/catalog.php?cat=<?php echo $crumb['category']; ?>"><?php echo $crumb['category']; ?></a>
                        </li>
                    <?php } //end foreach?>
                <?php } ?>
            </ol>

        </section>
    </div>
</section>

    <section class="container-fluid">
        <div class="row">
           <?php if (isset($param)) { ?>
               <?php $tools = first_item_query($param); ?>
                  <?php foreach ($tools as $item) : ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="container-fluid">
                        <article class="cards">
                                  <div class="col-12">
                                       <section class="card-holder" id="<?php echo $item['code']; ?>">
                                            <section class="card code">
                                                <h2 class="details cat-order-code bottom-drop center" data-code="<?php echo $item['code']; ?>">Code: <?php echo $item['code']; ?></h2>
                                                <h3 class="details cat-order-name center"><?php echo $item['name']; ?></h3>
                                                <img class="details cat-order-image thumbnail box-image-width" src="<?php echo IMAGES .  $item['image']; ?>" alt="<?php echo $item['description']; ?>">
                                                <h4 class="details cat-order-price" data-value="<?php echo $item['price']; ?>">Price: <?php echo $price = ($item['price'] == 0 ? 'Make offer' :  '$' . $item['price']); ?></h4>
                                                <h4 class="details cat-order-sold sale"><?php echo $sold = ($item['sold'] == 0 ? 'For Sale' : 'sold'); ?></h4>
                                                <a class="details cat-order-btn btn btn-lg btn-outline-danger btn-width center-block"  href='/pages/details.php?id=<?php echo $item['id']?>'><?php echo $item['id']; ?></a>
                                            </section>
                                       </section>
                                  </div>
                        </article>
                </div>
            </div>
               <?php endforeach; ?>
           <?php } ?>
        </div>
    </section>

<?php include(SHARED_PATH . '/footer.php'); ?>
