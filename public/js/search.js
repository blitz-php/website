
const searchbox = document.getElementById('searchbox-container')
const searchCancelBtn = document.querySelector('button.DocSearch-Cancel')
const searchResetBtn = document.querySelector('button.DocSearch-Reset')
const searchInitBtn = document.querySelector('div.bd-search')
const searchInput = document.getElementById('docsearch-input')
const searchResult = document.querySelector('div.DocSearch-Dropdown')

const fuseOptions = {
	// isCaseSensitive: false,
	// includeScore: false,
	// shouldSort: true,
	includeMatches: true,
	// findAllMatches: false,
	minMatchCharLength: 2,
	// location: 0,
	threshold: 0.2,
	distance: 25,
	// useExtendedSearch: false,
	ignoreLocation: true,
	// ignoreFieldNorm: false,
	// fieldNormWeight: 1,
	keys: [
        { name: 'title', weight: 3 },
        { name: 'keywords', weight: 2 },
        'description', 'sections.title',
    ]
};

let fuse = null;

const miniSearch = new MiniSearch({
    idField: 'slug',
    fields: ['keywords', 'title'],
    storeFields: ['title']
})

// Chargement des indexes pour la recherches
window.addEventListener('load', async function() {
    const version = searchInitBtn.getAttribute('data-bd-docs-version');

    const indexes = await this.fetch(`/docs/${version}/index.json`).then(response => response.json())

    fuse = new Fuse(indexes, fuseOptions);
    miniSearch.addAll(indexes)
})

document.addEventListener('keydown', function(event) {
    if (event.ctrlKey && event.code === 'KeyK') {
        event.preventDefault()
        searchInitBtn.click()
    }
});  

searchInitBtn.addEventListener('click', function(e) {
    e.preventDefault();
    searchbox.classList.remove("d-none");
    document.body.style.overflow = 'hidden';
    searchInput.focus();
})

searchInput.addEventListener('input', function(e) {
    const query   = this.value
    handleSearch(query)
});

searchResetBtn.addEventListener('click', function() {
    this.setAttribute('hidden', true)
    searchInput.value = ''
    searchInput.focus()
    searchResult.innerHTML = /*html*/`<div class="DocSearch-StartScreen">
        <p class="DocSearch-Help">Pas de recherche récente</p>
    </div>`;
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        hideBox();
    }
}); searchCancelBtn.addEventListener('click', function() {
    hideBox();
}); searchbox.addEventListener('click', function(e) {
    if (e.target == this) {
        hideBox()
    }
});

function hideBox() {
    searchbox.classList.add("d-none");
    document.body.style.overflow = 'auto';
}

const renderSearchResults = (results, query) => {
    if (query == null || query === undefined || !query.length) {
        searchResult.innerHTML = /*html*/`<div class="DocSearch-StartScreen">
            <p class="DocSearch-Help">Pas de recherche récente</p>
        </div>`;
        return;
    }

    if (! results.length) {
        return forEmptyResult(query)
    }

    const tab = []

    results.forEach(({item, matches}) => {
        matches.forEach(({ value, key, refIndex }) => {
            const url = item.url 
            tab.push({
                value,
                title  : item.title,
                section: item.section,
                isChild: refIndex !== undefined,
                url    : key != 'sections.title' ? url: `${url}#${item.sections[refIndex].fragment}`,
            })
        })
    })

    results = groupBy(tab)
    let group = ''

    for (const key in results) {
        const data = results[key].map((item, i) => drawResultItem(item, i)).join('\n')
    
        group += /*html*/`<section class="DocSearch-Hits">
            <div class="DocSearch-Hit-source">${key}</div>
            <ul role="listbox" aria-labelledby="docsearch-label" id="docsearch-list">${data}</ul>
        </section>`
    }

    searchResult.innerHTML = group
}

const groupBy = (indexes) => {
    return indexes.reduce(function (r, a) {
        r[a.section] = r[a.section] || [];
        r[a.section].push(a);
        
        return r;
    }, Object.create(null));
}

const suggest = (suggestion) => {
    searchInput.value = suggestion
    searchInput.focus()
    handleSearch(suggestion)
}

const handleSearch = (query) => {
    let results = []
    if (query.length) {
        results = fuse.search(query)
        searchResetBtn.removeAttribute('hidden')
    } else {
        searchResetBtn.setAttribute('hidden', true)
    }
    renderSearchResults(results, query)
}

/**
 * Affichage en cas d'absence de resultat
 */
const forEmptyResult = (query) => {
    const suggest = miniSearch.autoSuggest(query, { boost: { title: 5 } })
        .filter(({ suggestion, score }, _, [first]) => score > first.score / 4)
        .slice(0, 5)
    
    let suggestions = suggest.map(({suggestion}) => {
        return `<li><button onclick="suggest('${suggestion}')" class="DocSearch-Prefill" type="button">${suggestion}</button></li>`
    })
        
    suggestions = ! suggestions.length
        ? ''
        : /*html*/`<div class="DocSearch-NoResults-Prefill-List">
            <p class="DocSearch-Help">Essayez de rechercher:</p>
            <ul>${suggestions.join("\n")}</ul>
        </div>`

    searchResult.innerHTML = /*html*/`<div class="DocSearch-NoResults">
        <div class="DocSearch-Screen-Icon">
            <svg width="40" height="40" viewBox="0 0 20 20" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15.5 4.8c2 3 1.7 7-1 9.7h0l4.3 4.3-4.3-4.3a7.8 7.8 0 01-9.8 1m-2.2-2.2A7.8 7.8 0 0113.2 2.4M2 18L18 2"></path>
            </svg>
        </div>
        <p class="DocSearch-Title">Aucun résultat pour "<strong>${query}</strong>"</p>
        ${suggestions}
    </div>`
}

/**
 * Affichage des elements de recherche 
 */
const drawResultItem = ({ value, isChild, title, url }, i) => {
    const Tree = !isChild 
        ? '' : /*html*/ `<svg class="DocSearch-Hit-Tree" viewBox="0 0 24 54">
            <g stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                <path d="M8 6v21M20 27H8.3"></path>
            </g>
        </svg>`;
    const Icon = !isChild 
        ? /*html*/ `<svg width="20" height="20" viewBox="0 0 20 20">
            <path d="M17 6v12c0 .52-.2 1-1 1H4c-.7 0-1-.33-1-1V2c0-.55.42-1 1-1h8l5 5zM14 8h-3.13c-.51 0-.87-.34-.87-.87V4" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linejoin="round"></path>
        </svg>`
        : /*html*/ `<svg width="20" height="20" viewBox="0 0 20 20">
            <path d="M13 13h4-4V8H7v5h6v4-4H7V8H3h4V3v5h6V3v5h4-4v5zm-6 0v4-4H3h4z" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>`
    const Path = !isChild
        ? ''
        : /*html*/`<span class="DocSearch-Hit-path">${title}</span>`

    return /*html*/`<li class="DocSearch-Hit ${isChild ? 'DocSearch-Hit--Child' : ''}" id="docsearch-item-${i}" role="option" aria-selected="false">
        <a href="${url}">
            <div class="DocSearch-Hit-Container">
                ${Tree}
                <div class="DocSearch-Hit-icon">${Icon}</div>
                <div class="DocSearch-Hit-content-wrapper">
                    <span class="DocSearch-Hit-title">${value}</span>
                    ${Path}
                </div>
                <div class="DocSearch-Hit-action">
                    <svg class="DocSearch-Hit-Select-Icon" width="20" height="20" viewBox="0 0 20 20">
                        <g stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 3v4c0 2-2 4-4 4H2"></path>
                            <path d="M8 17l-6-6 6-6"></path>
                        </g>
                    </svg>
                </div>
            </div>    
        </a>
    </li>`
}
