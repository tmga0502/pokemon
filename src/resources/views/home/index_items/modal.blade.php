<div id="searchModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h1>検索</h1>
      <span id="modalClose">×</span>
    </div>
    <div class="modal-body">
      <div class="form-group w-50 mx-auto mb-4">
        <label for="search_id">ID検索</label>
        <input id="search_id" type="number" class="form-control form-control-sm">
      </div>

      <div class="form-group w-50 mx-auto">
        <label for="search_name">名前検索</label>
        <input id="search_name" type="text" class="form-control form-control-sm">
      </div>

      <div class="submit_area mt-5">
        <button id="search_submit" class="btn btn-danger rounded-pill w-50" type="button">検索</button>
      </div>



      <div class="result-area">
        <p id="result_text"></p>
        <div id="result_pokemon_area">
        </div>
      </div>

    </div>

  </div>

</div>