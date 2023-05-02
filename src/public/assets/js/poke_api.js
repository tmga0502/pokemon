//ポケモンデータの読み込み（非同期処理）
const getPokemon = async (min, max) =>{
    //画面レイアウト上、ブラウザサイズによって表示される列数が2,3,4,6列のいずれか。
    //最小公倍数の12の倍数ごとに取得することで綺麗に埋まる（以下は48匹ずつ取得）
    for (let i = min; i < max; i++) {
        //ポケモン情報の取得（awaitで取得を待つ）
        const pokemon = await fetch('https://pokeapi.co/api/v2/pokemon/' + i + '/').catch(error => {console.error('ng', error)})
        const pokemon_data = await pokemon.json()
        const id = i  //id(let宣言しているi)
        const img_url = pokemon_data['sprites']['other']['official-artwork']['front_default'] //画像の取得

        //種族情報から名前の取得
        const species = await fetch(pokemon_data['species']['url'])
        const species_data = await species.json()
        const ja_name = species_data.names.find((v) => v.language.name === "ja")

        //domの埋め込み
        await $('#poke_area').append(
            `
             <div class="col-6 col-md-4 col-lg-3 col-xl-2 d-none poke_col">
                <a href="" class="poke_link" data-id="${id}" data-name="${ja_name.name}">
                  <div class="poke_box p-2">
                    <div class=w-100">
                      <img src="${img_url}" alt="${ja_name.name}"/>
                    </div>
                  </div>
                  <div class="text-center">
                    <p class="mt-0 mb-5">${ja_name.name}</p>
                  </div>
                </a>
             </div>
            `
        )

    }

}



//画面を読み込んだ際に発動
$(async () => {
    await getPokemon(1, 49)
    $('.poke_col').removeClass('d-none')//ポケモンたちを表示
    $('#spinner').addClass('d-none')//loading imgを非表示
    $('#more_pokemon_btn').removeClass('d-none')//更に読み込むボタン表示
})

$('#more_pokemon_btn').on('click', async () => {
    const now_pokemon_count = $('.poke_link').length
    const min = now_pokemon_count + 1
    const max = now_pokemon_count + 49

    await $('#more_pokemon_btn').addClass('d-none')//更に読み込むボタン非表示
    await $('#spinner').removeClass('d-none')//loading imgを表示
    await getPokemon(min, max)
    $('.poke_col').removeClass('d-none')//ポケモンたちを表示
    $('#spinner').addClass('d-none')//loading imgを非表示
    $('#more_pokemon_btn').removeClass('d-none')//更に読み込むボタン表示
})