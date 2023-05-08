function create(id) {
    let title = document.querySelector('[data-test="product-title"]').innerHTML
    title = title.replaceAll("'", "\'")
    let category = document.querySelector('[data-test="product-sub-title"]').innerHTML
    category = category.replaceAll("'", "\'")
    let price = document.querySelector('[data-test="product-price"]').innerHTML
    price = +price.replace('₫','').replaceAll(',','')

    let a = [...document.querySelectorAll('.u-full-width.u-full-height[data-fade-in="css-147n82m"]')].filter(x => x.style.objectFit == 'contain')
    let b = a.splice(1,1)
    a = a.map(x=>{
        return x.parentElement.parentElement.lastChild.lastChild.src
    })
    a = 'INSERT INTO `tb_products` (`id`,`title`, `image`, `price`, `category`) VALUES ' + `(${id}, "${title}", "${a[0]}", ${price}, "${category}");` + 'INSERT INTO `tb_images` (`id`, `product_id`, `image`) VALUES ' + a.slice(0,4).map((x,i)=>{
        return `(NULL, ${id}, "${x}")`
    })
    return a;
}