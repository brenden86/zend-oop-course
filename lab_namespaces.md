## 1. Namespaces used in **OrderApp**
`OrderApp\Controller`\
`OrderApp\Core\Controller`\
`OrderApp\Core\Db`\
`OrderApp\Core\Form`\
`OrderApp\Core\Form\Inputs`\
`OrderApp\Core\Html`\
`OrderApp\Core\Messaging`\
`OrderApp\Core\Service`\
`OrderApp\Core\Traits`\
`OrderApp\Core\Validator`\
`OrderApp\Core\View`\
`OrderApp\Domain`\
`OrderApp\Form`\
`OrderApp\Model`\
`OrderApp\Service`

## 2. How is autoloading initiated?
A PSR-4 autoloader is registered via composer. It autoloads all namespaces that match the directory structure within the `src` directory

