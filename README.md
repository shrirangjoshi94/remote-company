# About the project

## How to install

- Do the git clone of the project

  ```
  git clone git@github.com:shrirangjoshi94/remote-company.git
  ```

- Navigate inside project directory

  ```
  cd remoe-company
  ```

- Checkout the development branch

  ```
  git checkout development
  ```

- Create environment file by copying .env.example file to .env
  ```
  cp .env.example .env
  ```

- Create environment file by copying .env.example file to .env
  ```
  cp .env.example .env
  ```
  
- In the .env file update the below keys with values

  ```
  DB_CONNECTION=sqlite
  ```

- Run the below commands

  ```
    composer install
    npm install
    touch database/database.sqlite
  ```

- To start the project run the below command and then navigate to http://localhost:8000/

  ```
    php artisan serve
  ```
