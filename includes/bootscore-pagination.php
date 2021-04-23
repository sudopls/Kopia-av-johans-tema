<?php
/**
 * Bootstrap 5 Pagination
 *
 * Stolen from Bootscore 2021-04-23, modified for Bootstrap 5.0-beta3 and cleaned up.
 * <https://github.com/craftwerkberlin/bootscore-5/blob/2632ad5986d5f87af0e491217695acb3e67c9350/functions.php#L312>
 */

function bootscore_pagination($pages = '', $range = 2) {
	$showitems = ($range * 2) + 1;
	global $paged;
	if ($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if (!$pages)
			$pages = 1;
	}

	if (1 != $pages) {
		echo '<nav aria-label="Page navigation" role="navigation">';
		echo '<span class="visually-hidden">Page navigation</span>';
		echo '<ul class="pagination justify-content-center ft-wpbs mb-4">';

		if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(1) . '" aria-label="First Page">&laquo;</a></li>';
		}

		if ($paged > 1 && $showitems < $pages) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged - 1) . '" aria-label="Previous Page">&lsaquo;</a></li>';
		}

		for ($i = 1; $i <= $pages; $i++) {
			if (1 != $pages && (! ($i >= $paged + $range+1 || $i <= $paged - $range - 1) || $pages <= $showitems) ) {
				echo ($paged == $i || ($paged == 0 && $i == 1))
					? '<li class="page-item active"><span class="page-link"><span class="visually-hidden">Current Page </span>' . $i . '</span></li>'
					: '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($i) . '"><span class="visually-hidden">Page </span>' . $i . '</a></li>';
			}
		}

		if ($paged < $pages && $showitems < $pages) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged + 1) . '" aria-label="Next Page">&rsaquo;</a></li>';
		}

		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($pages) . '" aria-label="Last Page">&raquo;</a></li>';
		}

		echo '</ul>';
		echo '</nav>';
		// echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';
	}
}
