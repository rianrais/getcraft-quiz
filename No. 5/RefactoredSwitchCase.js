

/**
 *  My logic was by nesting a function inside an object. 
 *  By reducing its complexities, you can get maintainability and readability.
 */ 

// FROM:
switch (condition) {
    case 'foo':
    // Do foo stuffs
    break;

    case 'bar':
    // Do bar stuffs
    break;

    case 'stool':
    // Do stool stuffs
    break;

    default:
    // Do default stuffs
    break;
}

// TO:
function doStuffWhen(condition) {
    let cases = {
        'foo' : 'Do foo stuffs',
        'bar' :  'Do bar stuffs',
        'stool' : 'Do stool stuffs',
        'default' : 'Do default stuffs'
    };

    if (cases.hasOwnProperty(condition)) {
        return cases[condition];
    }
}