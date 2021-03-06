[![preview](preview.png?raw=true)](https://collectifbam.fr/)

## Development

###### Installation
```sh
$ git clone https://github.com/arnaudjuracek/www-bam
$ cd www-bam
$ npm install
```

###### Usage
```sh
$ npm run start # start kirby-webpack devserver
$ npm run build # build and bundle src/ into www/assets/
```

###### Deployment
```sh
$ npm version [major|minor|patch]
```
<sup>`preversion` and `postversion` scripts will take care of building, pushing and deploying using [`git-ftp`](https://github.com/git-ftp/git-ftp).</sup>

## Credits

Built with [**kirby-webpack**](https://github.com/brocessing/kirby-webpack).

## License

[MIT](https://tldrlegal.com/license/mit-license).
