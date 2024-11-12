document.addEventListener( 'DOMContentLoaded', () => {


    let page = 1;
    let offset = 3;

    // Обявление всех активных кнопок и селекторов
    const loadMoreButton = document.getElementById( 'load_more' ),
        postsContainer = document.getElementById( 'load_more_container' ),
        sortSelect = document.getElementById( 'sort_by' ),
        genreCategory = document.getElementById( 'genre' ),
        startDateInput = document.getElementById('start_date'),
        endDateInput = document.getElementById('end_date'),
        applyFiltersButton = document.getElementById('apply_filters');

    function loadPosts( requestType ) {

        if ( requestType ) {
            page = 1;
            offset = 0;
            postsContainer.innerHTML = '';
            loadMoreButton.style.display = 'block';
        }

        const data = new FormData();
        data.append( 'action', "ajax_sort_movies" );
        data.append( 'nonce', ajax_data.nonce );
        data.append( 'page', page );
        data.append( 'offset', offset );
        data.append( 'sort_by', sortSelect.value );
        data.append( 'genre', genreCategory.value );
        data.append( 'start_date', startDateInput.value );
        data.append( 'end_date', endDateInput.value );

        fetch( ajax_data.ajax_url, {
            method: 'POST',
            body: data
        } )
            .then( response => response.text() )
            .then( html => {
                if ( html.includes( 'No more movies' ) ) {
                    loadMoreButton.style.display = 'none';
                } else {
                    postsContainer.insertAdjacentHTML( 'beforeend', html );

                    page++;
                    offset += 3;
                    const loadedPosts = ( html.match( /<article/g ) || [] ).length;
                    if ( loadedPosts < 3 ) {
                        loadMoreButton.style.display = 'none';
                    }
                }
            } )
            .catch( error => console.error( 'Error:', error ) );
    }


    loadMoreButton.addEventListener( 'click', () => loadPosts() );

    sortSelect.addEventListener( 'change', () => loadPosts( 'newRequest' ) );

    applyFiltersButton.addEventListener( 'click', () => loadPosts( 'newRequest' ) );



    // Mobile menu
    const mobileMenuBtn = document.getElementById( 'mobile_menu_btn' );
    const menuWrapper =  document.getElementById( 'menu_wrapper' );
    function activeMobileMenu() {
        if ( mobileMenuBtn && menuWrapper ) {
            if ( ! mobileMenuBtn.classList.contains( 'active-btn' ) ) {
                mobileMenuBtn.classList.add( 'active-btn' );
                mobileMenuBtn.classList.remove( 'deactivate-btn' );
                document.querySelector( 'html' ).style.overflow = 'hidden';
            } else {
                mobileMenuBtn.classList.remove( 'active-btn' );
                mobileMenuBtn.classList.add( 'deactivate-btn' );
                document.querySelector( 'html' ).style.overflow = 'auto';
            }
            menuWrapper.classList.toggle( 'active-menu' );
        }
    }

    mobileMenuBtn.addEventListener( 'click', activeMobileMenu );
} );
