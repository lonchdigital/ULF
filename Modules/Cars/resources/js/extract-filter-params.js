export function extractFilterParams(filters) {
    filters['yearFrom'] = getParameterByName('yearFrom');
    filters['yearTo'] = getParameterByName('yearTo');

    filters['orderValue'] = getParameterByName('order');

    filters['fuelType'] = getParameterByName('fuelType') 
        ? getParameterByName('fuelType').split(',').map(Number)
        : [];

    filters['bodyTypes'] = getParameterByName('bodyTypes') 
        ? getParameterByName('bodyTypes').split(',').map(Number)
        : [];

    filters['driverTypes'] = getParameterByName('driverTypes') 
        ? getParameterByName('driverTypes').split(',').map(Number)
        : [];
  
    filters['engineFrom'] = getParameterByName('engineFrom');
    filters['engineTo'] = getParameterByName('engineTo');

    return filters;
}

function getParameterByName(name) {
    const url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
    const results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}