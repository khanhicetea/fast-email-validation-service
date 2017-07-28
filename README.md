# Fast Email Validation Service

Email Validation as a HTTP Service with high-speed and concurrent checking !

# Why is it fast ?

- Based on [Fast Email Validator library](https://github.com/khanhicetea/fast-email-validator)
- Run as HTTP server (based on ReactPHP)

# Get Started

## Run on command line

```bash
$ php react server 8000
```

## Run as docker service

```bash
$ docker run -d -p 8000:8000 khanhicetea/fast-email-validation-service
```

## Using

```bash
$ curl "http://localhost:8000/validate?q=hi@khanhicetea.com"
```

**Result**

```json
{
  "valid_format": true,
  "disposable_email_provider": false,
  "valid_host": true,
  "free_email_provider": false,
  "valid_mx_records": true,
  "role_or_business_email": true
}
```

# Contributors

- @khanhicetea

# License

MIT License