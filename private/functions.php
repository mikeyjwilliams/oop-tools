<?php


/**
 * License: GPL3
 * Created by PhpStorm.
 * User: mike
 * Date: 8/21/17
 * Time: 2:31 PM
 */

// script function to connect urls to root path.
/**
 * @param $script_path
 * @return string
 */
function url_for($script_path) {
    // adds leading '/' if not present.
    if ($script_path[0] != '/') {
        $script_path = '/' . $script_path;
    }

    return WWW_ROOT . $script_path;
}

/**
 * @param $node_modules
 * @return string
 */
function node_module($node_modules) {
    // leading ./ if not present.
    if ($node_modules[0] != './') {
        $node_modules = './' . $node_modules;
    }
    return $node_modules;
}



################################################# queries to database,
/**
 * @param $con
 * @param $query
 * @param $variables
 * @return mixed
 */
function execute_query($con, $query, $variables) {
    $stmt = $con->prepare($query);
    $stmt->execute($variables);
    return $stmt;

}

/**
 * @param $parameter
 * @return array|mixed
 */
function first_item_query($parameter) {
    $con = Connection::make(); // the connection to the db.
    try {
            $sql = "SELECT t.t_id AS id, t.item_code AS code, t.item_name AS name,
                       t.sale_price AS price, t.description as description,
                       t.sold AS sold, 
                       b.brand AS brand, c.category AS category,                                  
                       tt.tool_type AS section, i.image AS image
                       FROM Tools AS t
                       INNER JOIN Brands AS b ON t.b_id = b.b_id
                       INNER JOIN Categories AS c ON t.c_id = c.c_id
                       INNER JOIN Images AS i ON t.t_id = i.t_id
                       LEFT OUTER JOIN Types AS tt ON t.tt_id = tt.tt_id
                       WHERE tt.tool_type = :tool AND i.image_num = 1";
            /** @var $items $items */
            $items = $con->prepare($sql);
            $items->bindParam(':tool', $parameter, PDO::PARAM_STR);
            $items->execute();
            return $items;
    }catch(PDOException $e) {
        $e->getMessage();
        exit;
    }
    return $items;
} // end of function first_item_query()

function catalog_breadcrumb_query($parameter) {
    $con = Connection::make();
    try {
            $sql = "SELECT c.tool_type AS category
                     FROM Tools AS t
                     JOIN Types c ON t.tt_id = c.tt_id
                     WHERE c.tool_type = :breadcrumb LIMIT 1";
            $breadcrumb = $con->prepare($sql);
            $breadcrumb->bindParam(':breadcrumb', $parameter, PDO::PARAM_STR);
            $breadcrumb->execute();
            return $breadcrumb;

    }catch(PDOException $e) {
        $e->getMessage();
        exit;
    }
    return $breadcrumb;
}

function detail_breadcrumb_query($id) {
    $db = Connection::make();
    try {
        $sql = "SELECT t.item_code as code,  c.tool_type as category
                               FROM Tools as t
                               JOIN Types c ON t.tt_id = c.tt_id
                               WHERE t.t_id = :breadcrumb LIMIT 1";
        $detail_breadcrumb = $db->prepare($sql);
        $detail_breadcrumb->bindParam(':breadcrumb', $id, PDO::PARAM_INT);
        $detail_breadcrumb->execute();
        return $detail_breadcrumb;
    }catch(PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    return $detail_breadcrumb;
}

function single_item_details($id) {
    try {
        $db = Connection::make();
        $sql = "SELECT t.item_code AS code, t.item_name AS name, 
                      t.retail_price AS retail, t.sale_price AS price, 
                      t.item_pieces AS pieces, t.qty AS quantity, t.sold AS sold,
                      b.brand AS brand, c.category AS category, tt.tool_type AS tool_type,
                      t.description AS description
                      FROM Tools AS t
                      INNER JOIN Brands AS b ON t.b_id = b.b_id
                      INNER JOIN Categories AS c ON t.c_id = c.c_id 
                      INNER JOIN Types AS tt ON tt.tt_id = t.tt_id
                      WHERE t.t_id = :id LIMIT 1";
        $details = $db->prepare($sql);
        $details->bindParam(':id', $id, PDO::PARAM_INT);
        $details->execute();
        return $details;
    }catch(PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    return $details;
}

function detail_images_query($id) {
    try {
        $db = Connection::make();
        $sql = "SELECT t.t_id as id,
                t.description as description,
                i.image as image
                FROM Tools as t
                JOIN Images as i
                ON t.t_id = i.t_id
                WHERE t.t_id = :image";
        $images = $db->prepare($sql);
        $images->bindParam(':image', $id, PDO::PARAM_INT);
        $images->execute();
        return $images;
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
    return $images;
}