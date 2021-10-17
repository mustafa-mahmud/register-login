export async function dataSend(url, method, data) {
  const res = await fetch(url, {
    method: method,
    body: data,
  });

  const info = await res.text();

  return info;
}
