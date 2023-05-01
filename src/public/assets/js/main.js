$(() => {
    "use strict"

//************
// Modal
// ***********
    //open
    $('#modalOpen').on('click', () => {
        $('#searchModal').addClass('d-block').removeClass('d-none');
    })

    //x印close
    $('#modalClose').on('click', () => {
        $('#searchModal').addClass('d-none').removeClass('d-block')
        result_pokemon_area_del()
    })

    //Modal以外のコンテンツクリック
    $(document).on('click', (e) => {
        if ($(e.target).attr('id') == 'searchModal') {
            $('#searchModal').addClass('d-none').removeClass('d-block')
            result_pokemon_area_del()
        }
    })

//************
// 検索ボタンが押されたときの処理
// ***********



})

// 検索ボタンが押されたときの処理


const searchButton = document.getElementById('search_submit');

searchButton.addEventListener('click', () => {

    const pokeId = document.getElementById('search_id').value
    const pokeName = document.getElementById('search_name').value
    // const result_pokemon_area = document.getElementById('result_pokemon_area')
    // const result_text = document.getElementById('result_text')

    //IDと名前両方入力がされていたらエラー
    if(pokeId != '' && pokeName != ''){
        alert('IDと名前の両方を検索することはできません。')
        return
    }

    //既存のポケモン要素(result_pokemon_area)の削除
    // while(result_pokemon_area.firstChild){
    //   result_pokemon_area.removeChild(result_pokemon_area.firstChild)
    // }
    result_pokemon_area_del()


    // //ID検索の場合
    // if(pokeId != ''){
    //   //ID検索
    //   let pokemon = document.querySelector('[data-id="' + pokeId +'"]')
    //   if(pokemon == null){
    //     result_text.textContent = '該当するポケモンが見つかりませんでした'
    //   }else{
    //     result_text.textContent = 'こちらのポケモンが見つかりました！'
    //     //cloneの作成（複製）
    //     let clone = pokemon.cloneNode(true)
    //     //cloneをresult_pokemon_areaの最後に埋め込む
    //     result_pokemon_area.appendChild(clone)
    //   }
    // }

    // //名前検索の場合
    // if(pokeName != ''){
    //   //名前検索
    //   let pokemon = document.querySelector('[data-name="' + pokeName +'"]')
    //   if(pokemon == null){
    //     result_text.textContent = '該当するポケモンが見つかりませんでした'
    //   }else{
    //     result_text.textContent = 'こちらのポケモンが見つかりました！'
    //     //cloneの作成（複製）
    //     let clone = pokemon.cloneNode(true)
    //     //cloneをresult_pokemon_areaの最後に埋め込む
    //     result_pokemon_area.appendChild(clone)
    //   }
    // }


    if(pokeId != ''){
        //名前検索
        let pokemon = document.querySelector('[data-id="' + pokeId +'"]')
        poke_search_result(pokemon)
    }
    if(pokeName != ''){
        //名前検索
        let pokemon = document.querySelector('[data-name="' + pokeName +'"]')
        poke_search_result(pokemon)
    }

})

const poke_search_result = (pokemon) => {
    const result_text = document.getElementById('result_text')
    if(pokemon == null){
        result_text.textContent = '該当するポケモンが見つかりませんでした'
    }else{
        result_text.textContent = 'こちらのポケモンが見つかりました！'
        //cloneの作成（複製）
        let clone = pokemon.cloneNode(true)
        //cloneをresult_pokemon_areaの最後に埋め込む
        result_pokemon_area.appendChild(clone)
    }
}

//既存のポケモン要素(result_pokemon_area)の削除
const result_pokemon_area_del = () =>{
    const result_pokemon_area = document.getElementById('result_pokemon_area')
    while(result_pokemon_area.firstChild){
        result_pokemon_area.removeChild(result_pokemon_area.firstChild)
    }
}