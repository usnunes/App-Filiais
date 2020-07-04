object DM: TDM
  OldCreateOrder = False
  Height = 330
  Width = 444
  object RESTClient1: TRESTClient
    Accept = 'application/json, text/plain; q=0.9, text/html;q=0.8,'
    AcceptCharset = 'utf-8, *;q=0.8'
    BaseURL = 'http://192.168.100.5/AppFilial/public/api/filiais'
    Params = <>
    RaiseExceptionOn500 = False
    Left = 8
    Top = 224
  end
  object RESTRequest1: TRESTRequest
    Client = RESTClient1
    Params = <>
    Response = RESTResponse1
    SynchronizedEvents = False
    Left = 64
    Top = 224
  end
  object RESTResponse1: TRESTResponse
    ContentType = 'application/json'
    Left = 128
    Top = 224
  end
end
