DELIMITER //
CREATE TRIGGER tr_updStockCompra
AFTER
INSERT
    ON detalle_compras FOR EACH ROW BEGIN
UPDATE
    productos
SET
    stock = stock + NEW.cantidad
WHERE
    productos.id = NEW.producto_id;
END;
//

/* CREATE TRIGGER tr_updStockCompra AFTER INSERT ON detalle_compras FOR EACH ROW BEGIN UPDATE productos SET stock = stock + NEW.cantidad WHERE productos.id = NEW.producto_id; END;;*/
DELIMITER //
CREATE TRIGGER tr_updStockCompraAnular
AFTER
UPDATE
    ON compras FOR EACH ROW BEGIN
UPDATE
    productos p
    JOIN detalle_compras di ON di.producto_id = p.id
    AND di.compra_id = new.id
SET
    p.stock = p.stock - di.cantidad;
END;
//

/* CREATE TRIGGER tr_updStockCompraAnular AFTER UPDATE ON compras FOR EACH ROW BEGIN UPDATE productos p JOIN detalle_compras di ON di.producto_id = p.id AND di.fecha_compra = new.id SET p.stock = p.stock - di.cantidad; END;;*/
DELIMITER //
CREATE TRIGGER tr_updStockVenta
AFTER
INSERT
    ON detalle_ventas FOR EACH ROW BEGIN
UPDATE
    productos
SET
    stock = stock - NEW.cantidad
WHERE
    productos.id = NEW.producto_id;
END;
//

/* CREATE TRIGGER tr_updStockVenta AFTER INSERT ON detalle_ventas FOR EACH ROW BEGIN UPDATE productos SET stock = stock - NEW.cantidad WHERE productos.id = NEW.producto_id; END;;
 */
DELIMITER //
CREATE TRIGGER tr_updStockVentaAnular
AFTER
UPDATE
    ON ventas FOR EACH ROW BEGIN
UPDATE
    productos p
    JOIN detalle_ventas dv ON dv.producto_id = p.id
    AND dv.venta_id = new.id
SET
    p.stock = p.stock + dv.cantidad;
END;
//