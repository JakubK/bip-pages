<? 
    $id = get_post_field( 'post_author' ); 
    $author    = get_the_author_meta( 'display_name', $id );
    $revisions = wp_get_post_revisions();

    if ( $revisions ) {
        $last_revision = reset( $revisions );
        $last_editor_id = $last_revision->post_author;
        $last_editor = get_the_author_meta( 'display_name', $last_editor_id );
    }
?>

<footer class="entry-footer bip-footer">
  <p itemprop="author" itemscope itemtype="http://schema.org/Person">
    <?php
      /* translators: %s is the name of the original author of page contents */
      printf( esc_html__( 'Information prepared by: %s', 'bip-pages' ), $author );
    ?>
  </p>
  <p itemprop="publisher" itemscope itemtype="http://schema.org/Person">
    <?php
      /* translators: %s is the name of the user who published the page (may be a link) */
      printf( esc_html__( 'Published by: %s', 'bip-pages' ), $last_editor );
    ?>
  </p>
  <p itemprop="datePublished">
    <?php
      /* translators: %s is the date and time of page creation */
      printf( esc_html__( 'Page created: %s', 'bip-pages' ), $creation_tag )
    ?>
  </p>
  <p itemprop="dateModified">
    <?php
      /* translators: %s is the date and time of last page modification */
      printf( esc_html__( 'Last updated: %s', 'bip-pages' ), $last_modification_tag ) ?>
  </p>
</footer>
