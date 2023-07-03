<form action="<?php echo home_url( '/' ); ?>" class="form-inline">
    <input class="form-control mr-sm-2" placeholder="How may I help?" type="text" value="<?php echo get_search_query() ?>" name="s" id="s"">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>