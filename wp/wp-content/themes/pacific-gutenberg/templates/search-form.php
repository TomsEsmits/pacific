<div class="modal fade" id="searchModal" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
      <div class="modal-header border-0">
        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex align-items-center justify-content-center">
        <div class="input-group" style="max-width: 600px;">
          <form method="get" class="searchform input-group" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" class="form-control bg-transparent border-light p-3" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="Type search keyword" />
            <button type="submit" class="btn btn-light px-4" name="submit" id="searchsubmit">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>