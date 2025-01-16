export function setFilterParams(params, artThis) {

    // manufacturer
    let manufacturer = document.querySelector('.select-choose-manufacturer').value;
    if (manufacturer && manufacturer != 0) {
        params.set('manufacturer', manufacturer);
    } else {
        params.delete('manufacturer');
    }
    
    // model
    let model = document.querySelector('.select-choose-model').value;
    if (model && model != 0) {
        params.set('model', model);
    } else {
        params.delete('model');
    }

    // price filter min
    let priceFilterMin = document.querySelector('.price-filter-min').value;
    if(priceFilterMin) {
        params.set('priceMin', priceFilterMin);
    } else {
        params.delete('priceMin');
    }
    // price filter max
    let priceFilterMax = document.querySelector('.price-filter-max').value;
    if(priceFilterMax) {
        params.set('priceMax', priceFilterMax);
    } else {
        params.delete('priceMax');
    }

    // order
    let sortCatalogInput = document.getElementById('sort-catalog-input');
    if(artThis !== null) {
        sortCatalogInput.value = artThis.data('value');
    }
    if( sortCatalogInput.value != 0 ) {
        params.set('order', sortCatalogInput.value);
    } else {
        params.delete('order');
    }
    
    // graduation year from
    let graduationYearFrom = document.querySelector('.graduation-year-from').value;
    if(graduationYearFrom) {
        params.set('yearFrom', graduationYearFrom);
    } else {
        params.delete('yearFrom');
    }
    // graduation year to
    let graduationYearTo = document.querySelector('.graduation-year-to').value;
    if(graduationYearTo) {
        params.set('yearTo', graduationYearTo);
    } else {
        params.delete('yearTo');
    }

    // fuelType
    let fuelType = document.querySelector('.select-choose-fuel-types').value;
    if (fuelType && fuelType != 0) {
        params.set('fuelType', fuelType);
    } else {
        params.delete('fuelType');
    }

    // bodyTypes (checkboxes)
    let selectedBodyTypes = [];
    document.querySelectorAll('.body-type-input').forEach(checkbox => {
        if (checkbox.checked) {
            selectedBodyTypes.push(checkbox.value);
        }
    });
    if (selectedBodyTypes.length > 0) {
        params.set('bodyTypes', selectedBodyTypes.join(','));
    } else {
        params.delete('bodyTypes');
    }

    // driverTypes (checkboxes)
    let selectedDryverTypes = [];
    document.querySelectorAll('.dryver-type-input').forEach(checkbox => {
        if (checkbox.checked) {
            selectedDryverTypes.push(checkbox.value);
        }
    });
    if (selectedDryverTypes.length > 0) {
        params.set('driverTypes', selectedDryverTypes.join(','));
    } else {
        params.delete('driverTypes');
    }

    // engine from
    let engineVolumeFrom = document.querySelector('.engine-volume-from').value;
    if(engineVolumeFrom) {
        params.set('engineFrom', engineVolumeFrom);
    } else {
        params.delete('engineFrom');
    }
    // engine to
    let engineVolumeTo = document.querySelector('.engine-volume-to').value;
    if(engineVolumeTo) {
        params.set('engineTo', engineVolumeTo);
    } else {
        params.delete('engineTo');
    }

    return params;
}