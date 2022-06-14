<?php require_once('../../../private/initialize.php');//!Header data requires there to be no spaces
//!white space like this is ok
$test = $_GET['test']?? '';

if($test =='404'){//test if 404
    error_404();
}elseif($test == '500'){//test if 500
    error_500();
}
elseif($test=='redirect'){//test if redirect
redirect_to(url_for('staff/subjects/index.php'));
}
?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php');//path to header html ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a><!--send user back to index.php home-->

  <div class="subject new">
    <h1>Create Subject</h1>

    <form action="<?php echo url_for('staff/subjects/create.php')?>" method="post"><!--start form for new create form-->
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="" /></dd><!--input for menu name-->
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position"><!--get position-->
            <option value="1">1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" /><!--allows to choose not visible-->
          <input type="checkbox" name="visible" value="1" /><!--allows to choose visible -->
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Subject" /><!--submit button-->
      </div>
    </form><!--end form-->

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php');//path to footer for page html ?>

