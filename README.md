## RequestDataAdapter - Adapter for converting input data from Illuminate\Http\Request
This package provides easy conversion of input keys to your internal keys.

This adapter is perfect for you if for example you do not want to give your internal keys containing typos (but we know that you can’t have this😉), or vice versa, translate incorrect keys into the correct form.

## :scroll: **Installation**
The package can be installed via composer:
```
composer require yzen.dev/request-data-adapter
```

## :scroll: **Usage**
To use the adapter, you must connect this trait:
```php
class CommentStoreRequest extends FormRequest
{
    use RequestDataAdapter;
    ...
}
```
Then you need to implement the **mappingData** method (PHPStorm itself will offer you add method stubs)

```php
    /**
     * {@inheritDoc}
     */
    public function mappingData(): array
    {
        return [
            'tatle' => 'title',
            'autor' => 'author',
            'files' => [
                'file' => [
                    'document_name' => 'name'
                ],
            ],
            'additions' => [
                'date' => 'date_time',
            ],
        ];
    }
```

Thus, you can already work in the controller with the data set you need:

```json
{
  "title": "Test packages",
  "author": "Taylor",
  "files": [
    {
      "file": {
        "document_name": "my_photo"
      }
    }
  ],
  "additions": {
    "date": "date_time"
  }
}
```
