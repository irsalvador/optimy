# Notes

## Environment
1. PHP 8.1.10
2. MySQL  Ver 8.0.30 for Win64 on x86_64

## Bad Practices
1. Sensitive information such as database credentials are in the DB class itself.
2. Common methods in each class can be re-written in a base class to avoid repetition of methods.
3. Database instances were called multiple times.
4. Database queries were not secure, thus susceptible to attacks.
5. Missing PHPDoc on classes. This will help the team identify who last touched a file, either the whole class or the methods within it.
6. Class name on utils for both Comment and News should be repository and not manager. Since both classes' main responsibility is to handle data storage and retrieval operations for the entity it represents, it is better to rename the class as CommentRepository and NewsRepository. If the class contains business logic, the manager, as a class name, can be used.

## Refactor Suggestions
1. Implement .env file to handle sensitive information like database credentials.
2. Create a new class that will parse the .env file.
3. Use the parser of the .env file in the DB class.
4. Apply the Singleton pattern to the DB class to ensure a single instance is used throughout the application.
5. Use PDO prepare() and execute() in the query builder. This will help us prevent SQL injection attacks by eliminating the need to manually quote and escape the parameters.
6. Introduce the Repository pattern for the data access logic.
7. Create a base class for BaseRepository to handle the injection of the DB dependency into the subclasses and provides a common $db property that can be used by both repositories (CommentRepository and NewsRepository).
    - By using a base class, you avoid code duplication and ensure that the necessary dependencies are injected consistently across the repository classes.
8. Retain the Dependency Injection pattern for the class dependencies on Comment and News classes by encapsulating it with getters and setters methods. This allows for better control over the access and modification of the class properties.
9. Create a base class for BaseClass since it has a common structure and functionality for setting and getting the id property.
10. Extend both News and Comment class to BaseClass to inherit the get and set methods of id.
