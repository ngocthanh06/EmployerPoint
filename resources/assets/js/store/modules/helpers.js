export function transError(message, page = '') {
  if (typeof message === 'string') {
    return message;
  }

  let tmp = {};
  _.forIn(message, function (value, key) {
    if (typeof value[0] === 'string') {
      tmp[key] = value[0];
    }
  });

  return tmp;
}

export function transArray(message, val = {}) {
  if (_.isString(message)) {
  	return message;
  }

  let tmp = val;
  _.forIn(message, function(value, key) {
    _.isObject(value) ? transArray(value, tmp) : tmp[key] = value;
  });
  
  return tmp;
}
