module.exports = {
  collectionItemIndex: (collection, itemUrl) => {
    return collection.findIndex(colItem => colItem.url === itemUrl);
  },
};
